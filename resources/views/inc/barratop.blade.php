<div class="bar-top free-space-info">
    <div class="top-left">
        <div class="logo">
            <a>
                <img src={{asset('/'."homePublic/imgs/wiper-isologo.png")}}>
            </a>
        </div>
        <div class="paises">
            <ul>
                <?php foreach ( $oficinas as $ofi ) : ?>
                <li>
                    <a href="" class="">
                        <?=$ofi[0]?>
                        <span><?=$ofi[2]?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="top-right free-space">

    </div>
</div>