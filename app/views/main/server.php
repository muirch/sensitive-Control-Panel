<main role="main">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-4 p-0">
                <div class="col-12">
                    <div id="server<?php echo $srv[0]['s_id'] ?>">
                        <div class="panel" id="srv_stats">
                            <div class="panel__head">
                                Информация о сервере <?php echo ucfirst($srv[0]['s_type']) . ': ' . $srv[0]['s_name'] ?> (ID: <?php echo $srv[0]['s_id'] ?>)
                            </div>
                            <div class="panel__body pt-3 pb-3">
                                <p>IP: <?php echo $srv[0]['s_ip'] ?></p>
                                <p>Статус: <?php echo empty($srv[0]['s_hostname']) ? "Офлайн" : "Онлайн" ?></p>
                                <?php if (!empty($srv[0]['s_hostname'])): ?>
                                    <p>Hostname: <?php echo (!mb_check_encoding($srv[0]['s_hostname'], 'UTF-8') && mb_check_encoding($srv[0]['s_hostname'], 'windows-1251')) ? mb_convert_encoding($srv[0]['s_hostname'], 'UTF-8', 'windows-1251') : $srv[0]['s_hostname'] ?></p>
                                    <p>Ping: <?php echo $srv[0]['s_ping']?></p>
                                    <p>Количество игроков: <?php echo $srv[0]['s_players'] . '/' . $srv[0]['s_maxplayers'] ?></p>
                                    <p>Игровой режим: <?php echo $srv[0]['s_gamemode']?></p>
                                <?php endif; ?>
                                <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                    <input type="hidden" name="name" value="<?php echo $srv[0]['s_name']?>" hidden />
                                    <input type="hidden" name="game" value="<?php echo $srv[0]['s_type']?>" hidden />
                                    <input class="" type="submit" name="start"onclick="utilityForm.action='/start'; return true;" value="Включить сервер" />
                                    <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="panel" id="srv_stats">
                        <div class="panel__head">Другая информация сервера <?php echo $srv[0]['s_name']?></div>
                        <div class="panel__body pt-3 pb-3">
                            <?php foreach ($srv[2] as $key => $value): ?>
                                <p><?php echo $key . ': ' . $value; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="panel" id="srv_stats">
                        <div class="panel__head">Список игроков <?php echo $srv[0]['s_name']?></div>
                        <div class="panel__body pt-3 pb-3">
                            <table>
                                <tr>
                                    <td>ID</td>
                                    <td>Никнейм</td>
                                    <td>Уровень (очки)</td>
                                    <td>Пинг</td>
                                </tr>
                                <?php foreach ($srv[1] as $playerData): ?>
                                    <tr>
                                        <td><?php echo $playerData['playerid'] ?></td>
                                        <td><?php echo $playerData['nickname'] ?></td>
                                        <td><?php echo $playerData['score'] ?></td>
                                        <td><?php echo $playerData['ping'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                        </div>
                    </div>
            </div>
            </div>
            <div class="col-6">
                <div class="panel" id="srv_stats">
                    <div class="panel__head">Логи сервера <?php echo $srv[0]['s_name']?> <form class="ajax" method="post" action="/clean"><input type="hidden" name="id" value="<?php echo $srv[0]['s_id'] ?>" hidden /><input type="submit" name="submit" value="Очистить логи" /></form></div>
                    <div class="panel__body pt-3 pb-3">
                        <textarea style="min-width:100%;max-width:100%;min-height:400px;" disabled>
                            <?php echo (!mb_check_encoding($logs, 'UTF-8') && mb_check_encoding($logs, 'windows-1251')) ? mb_convert_encoding($logs, 'UTF-8', 'windows-1251') : $logs ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>