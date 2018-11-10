<main role="main">
    <div class="page-head"><p class="d-5">Панель управления</p></div>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-8">
                <div class="servers">
                    <div class="panel">
                        <div class="panel__head">Сервер SA-MP</div>
                        <div class="panel__body pt-3 pb-3">
                            <p>IP: </p>
                            <p>Онлайн: </p>
                            <p>Игровой режим:</p>
                            <form class="panel__utilities">
                                <input type="hidden" name="samp" hidden />
                                <input class="" type="submit" name="start" value="Запустить сервер" />
                                <input class="" type="submit" name="stop" value="Выключить сервер" />
                                <a class="" href="#">Посмотреть логи</a>
                            </form>
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