<?php
/**
 * Adapter to fix some issues from jsfiddle
 */
namespace Embed\Adapters;

use Embed\Viewers;
use Embed\Request;

class Spotify extends Webpage implements AdapterInterface
{
	public static function check(Request $request)
    {
        return $request->match(array(
            'http://open.spotify.com/*'
        ));
    }

    public function getCode()
    {
        $uri = 'spotify'.str_replace('/', ':', $this->request->getPath(true));

        return Viewers::iframe('https://embed.spotify.com/?uri='.$uri, 300, 380);
    }
}