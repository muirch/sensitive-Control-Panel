<main role="main">
    <div class="page-head"><p class="d-5">Панель управления</p></div>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-8">
                <div class="row servers">
                    <div class="col-6">
                        <div class="panel">
                            <div class="panel__head">Сервер SA-MP</div>
                            <div class="panel__body pt-3 pb-3">
                                <p>IP: </p>
                                <p>Онлайн: </p>
                                <p>Игровой режим:</p>
                                <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                    <input type="hidden" name="game" value="samp" hidden />
                                    <input class="" type="submit" name="start" value="Включить сервер" />
                                    <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                </form>
                                <a class="" href="#">Посмотреть логи</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="panel">
                            <div class="panel__head">Сервер SA-MP</div>
                            <div class="panel__body pt-3 pb-3">
                                <p>IP: </p>
                                <p>Онлайн: </p>
                                <p>Игровой режим:</p>
                                <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                    <input type="hidden" name="game" value="samp" hidden />
                                    <input class="" type="submit" name="start" value="Включить сервер" />
                                    <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                </form>
                                <a class="" href="#">Посмотреть логи</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="panel">
                            <div class="panel__head">Сервер SA-MP</div>
                            <div class="panel__body pt-3 pb-3">
                                <p>IP: </p>
                                <p>Онлайн: </p>
                                <p>Игровой режим:</p>
                                <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                    <input type="hidden" name="game" value="samp" hidden />
                                    <input class="" type="submit" name="start" value="Включить сервер" />
                                    <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                </form>
                                <a class="" href="#">Посмотреть логи</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="panel">
                            <div class="panel__head">Сервер SA-MP</div>
                            <div class="panel__body pt-3 pb-3">
                                <p>IP: </p>
                                <p>Онлайн: </p>
                                <p>Игровой режим:</p>
                                <form class="ajax panel__utilities" name="utilityForm" method="post" action="/start">
                                    <input type="hidden" name="game" value="samp" hidden />
                                    <input class="" type="submit" name="start" value="Включить сервер" />
                                    <input class="" type="submit" name="stop" onclick="utilityForm.action='/stop'; return true;" value="Выключить сервер" />
                                </form>
                                <a class="" href="#">Посмотреть логи</a>
                            </div>
                        </div>
                    </div>
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