<div>
    <? echo image_tag("/images/smile_".$status->getMoodName().".png",array('height'=>32))?>
    <span>
        <?echo __($status->getText())?>
    </span>
</div>