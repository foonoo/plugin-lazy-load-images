<?php


namespace foonoo\plugins\contrib\lazy_load_images;

use foonoo\events\PageOutputGenerated;
use foonoo\Plugin;
use foonoo\events\AssetPipelineReady;

class LazyLoadImagesPlugin extends Plugin
{
    public function getEvents()
    {
        return [
            PageOutputGenerated::class => [$this, 'modifyImageTags'],
            AssetPipelineReady::class => function(AssetPipeline $pipeline) {
                $pipeline->addJavascript("assets/lazy_load.js");
                $pipeline->addStylesheet("assets/lazy_load.css");
            }
        ];
    }

    public function modifyImageTags(PageOutputGenerated $event)
    {
        $dom = $event->getDOM();
    }
}
