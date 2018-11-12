<main role="main">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-8 p-0">
                <div class="row servers">
                    <?php foreach ($params['servers'] as $srv): ?>
                        <div class="col-6">
                            <div id="server<?php echo $srv['s_id'] ?>">
                                <div class="panel" id="innerServer">
                                    <div class="panel__head">
                                        Информация о сервере <?php echo ucfirst($srv['s_type']) . ': ' . $srv['s_name'] ?> (ID: <?php echo $srv['s_id'] ?>)
                                        <span class="float-right" onclick="update(<?php echo $srv['s_id'] ?>)"><i class="fas fa-sync-alt"></i></span>
                                    </div>
                                    <div class="panel__body pt-3 pb-3">
                                        <p>IP: <?php echo $srv['s_ip'] ?></p>
                                        <p>Статус: <?php echo empty($srv['s_hostname']) ? "Офлайн" : "Онлайн" ?></p>
                                        <?php if (!empty($srv['s_hostname'])): ?>
                                            <p>Ping: <?php echo $srv['s_ping']?></p>
                                            <p>Количество игроков: <?php echo $srv['s_players'] . '/' . $srv['s_maxplayers'] ?></p>
                                            <p>Игровой режим: <?php echo $srv['s_gamemode']?></p>
                                        <?php endif; ?>
                                        <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                            <input type="hidden" name="name" value="<?php echo $srv['s_name']?>" hidden />
                                            <input type="hidden" name="game" value="<?php echo $srv['s_type']?>" hidden />
                                            <input class="" type="submit" name="start" onclick="utilityForm.action='/start'; return true;" value="Включить сервер" />
                                            <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                            <a href="/server/<?php echo $srv['s_id'] ?>">Подробная информация</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-4">
                <div class="panel" id="srv_stats">
                    <div class="panel__head">Загруженность VPS (VDS)</div>
                    <div class="panel__body pt-3 pb-3">
                        <p>Процессор: <?php echo $params['stats']['cpu_model']; ?></p>
                        <p>Текущая загруженность процессора: <?php echo $params['stats']['cpu']; ?></p>
                        <p>Текущая загруженность ОЗУ: <?php echo $params['stats']['mem_used'] . 'mb / ' . $params['stats']['mem_total'] . 'mb (' . $params['stats']['mem_percent'] . '%)'; ?> </p>
                        <p>Дисковое пространство: <?php echo $params['stats']['hdd_used'] . 'gb / ' . $params['stats']['hdd_total'] . 'gb (' . $params['stats']['hdd_percent'] . '%)'; ?> </p>
                        <p>Uptime сервера: <?php echo $params['uptime']; ?> дня</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function update(id) {
        $('#server' + id).load('/ #server' + id);
    }
</script>