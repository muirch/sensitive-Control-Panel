<?php

namespace app\models;

use app\core\Model;
use McKnight\SampQuery;
use Net_SSH2;

/**
 * Class Main
 * @package app\models
 */
class Main extends Model
{
    /**
     * @var
     */
    public $error;

    public $base = [];

    public function __construct()
    {
        parent::__construct();
        $this->base = $this->getBaseSettings()[0];
    }

    public function serverUpTime()
    {
        $exec_uptime = preg_split("/[\s]+/", trim(shell_exec('uptime')));
        $uptime = $exec_uptime[2];
        return $uptime;
    }

    public function serverStats()
    {
        /**
         * CPU stats
         */
        $prevVal = shell_exec("cat /proc/stat");
        $prevArr = explode(' ',trim($prevVal));
        $prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
        $prevIdle = $prevArr[5];
        usleep(0.15 * 1000000);
        $val = shell_exec("cat /proc/stat");
        $arr = explode(' ', trim($val));
        $total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
        $idle = $arr[5];
        $intervalTotal = intval($total - $prevTotal);
        $stat['cpu'] =  intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
        $cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
        $stat['cpu_model'] = strstr($cpu_result, "\n", true);
        /**
         * Memory stats
         */
        $stat['mem_percent'] = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemTotal");
        $stat['mem_total'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemFree");
        $stat['mem_free'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $stat['mem_used'] = $stat['mem_total'] - $stat['mem_free'];
        /**
         * Disk space stats
         */
        $stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
        $stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024/ 1024, 2);
        $stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
        $stat['hdd_percent'] = round(sprintf('%.2f',($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);
        return $stat;
    }

    public function startServer($post)
    {
        if($post['game'] == 'samp') {
            $srv = $this->getServerData($post['name']);
            $ssh = new Net_SSH2($this->base['ssh_ip']);
            if (!$ssh->login($this->base['ssh_user'], $this->base['ssh_pass'])) {
                $this->error = 'Error connection to host! Check your settings!';
                return false;
            }
            $response = $ssh->exec('pgrep samp03svr');
            if($response) {
                $this->error = 'Server is already running!';
                return false;
            }
            elseif(!$response) {
                $ssh->exec('cd '. $srv['s_path'] .'; nohup ./samp03svr &');
                return true;
            }
        }
        $this->message = 'Error has been occur!';
        return false;
    }
    public function stopServer($post)
    {
        if ($post['game'] == 'samp') {
            $ssh = new Net_SSH2($this->base['ssh_ip']);
            if (!$ssh->login($this->base['ssh_user'], $this->base['ssh_pass'])) {
                $this->error = 'Error connection to host! Check your settings!';
                return false;
            }
            $ssh->exec('pkill -f samp03svr');
            return true;
        }
        $this->error = 'Error has been occur!';
        return false;
    }

    function getBaseSettings()
    {
        return $this->db->row('SELECT * FROM settings');
    }

    public function getAllServersData()
    {
        $result = $this->db->row('SELECT * FROM servers ORDER BY s_type');
        $srv_count = count($result);
        for ($i = 0; $i < $srv_count; $i++) {
            if ($result[$i]['s_type']=='samp') {
                $data = $this->getQueryData($result[$i]['s_ip']);
                $result[$i]['s_players'] = $data['players'];
                $result[$i]['s_maxplayers'] = $data['maxplayers'];
                $result[$i]['s_hostname'] = $data['hostname'];
                $result[$i]['s_gamemode'] = $data['gamemode'];
                $result[$i]['s_map'] = $data['map'];
            }
        }
        return $result;
    }

    function getServerData($name)
    {
        $params = [
            'name' => $name,
        ];
        $result = $this->db->row('SELECT * FROM servers WHERE s_name=:name ORDER BY s_type ', $params);
        return $result[0];
    }

    function getQueryData($ip)
    {
        $query = new SampQuery($ip);
        return $query->getInfo();
    }
}