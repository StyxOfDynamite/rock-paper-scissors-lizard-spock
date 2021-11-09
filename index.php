<?php

//===========================================
//=== TASK
//===========================================
/*

    Design a news feed reader that supports both RSS & ATOM

    Improve the poorly designed code below according to the SOLID priciples.
    More information on the principles at: 
    https://www.freecodecamp.org/news/solid-principles-explained-in-plain-english/

    # RSS STRUCTURE

    <?xml version="1.0" encoding="UTF-8" ?>
    <rss version="2.0">
        <channel>
            <title>W3Schools Home Page</title>
            <link>https://www.w3schools.com</link>
            <description>Free web building tutorials</description>
            <item>
                <title>RSS Tutorial</title>
                <link>https://www.w3schools.com/xml/xml_rss.asp</link>
                <description>New RSS tutorial on W3Schools</description>
            </item>
            <item>
                <title>XML Tutorial</title>
                <link>https://www.w3schools.com/xml</link>
                <description>New XML tutorial on W3Schools</description>
            </item>
        </channel>
    </rss>

    # ATOM STRUCTURE

    <?xml version="1.0" encoding="utf-8"?>
        <feed xmlns="http://www.w3.org/2005/Atom">
        <title>Example Feed</title>
        <link href="http://example.org/"/>
        <updated>2003-12-13T18:30:02Z</updated>
        <author>
            <name>John Doe</name>
        </author>
        <id>urn:uuid:60a76c80-d399-11d9-b93C-0003939e0af6</id>
        <entry>
            <title>Atom-Powered Robots Run Amok</title>
            <link href="http://example.org/2003/12/13/atom03"/>
            <id>urn:uuid:1225c695-cfb8-4ebb-aaaa-80da344efa6a</id>
            <updated>2003-12-13T18:30:02Z</updated>
            <summary>Some text.</summary>
        </entry>
    </feed>

*/
//===========================================
//=== LIBRARY
//===========================================

// FACTORY

class ReaderFactory {
    public static function get(FeedSourceInterface $data) :  ReaderInterface
    {   

        return new ReaderRSS($data->getText());
        new ReaderATOM($data->getText());

    }
}

// SOURCE

interface FeedSourceInterface {
    public function getText() : string;
}

class FeedSourceURL implements FeedSourceInterface {
    public function constructor($url) {
        // fetch the data
    }
    public function getText() : text {
        
    }
} 

// READER

interface ReaderInterface {
    public function getHeader() : HeaderInterface;
    public function getItems() : Array;
}

abstract class Reader implements ReaderInterface {
    abstract public function getHeader() : HeaderInterface;
    abstract public function getItems() : Array; // @TODO strictly type this!?
}

class ReaderRSS extends Reader {

    public function __construct(string $data) {

    }

    public function getHeader() : HeaderInterface {

    }
    public function getItems() : Array {

    }
}

class ReaderATOM extends Reader {

    public function __construct(string $data) {
        
    }

    public function getHeader() : HeaderInterface {

    }
    public function getItems() : Array {

    }
}

// HEADER

interface HeaderInterface
{
    public function getTitle(): string;
}

class RssHeader implements HeaderInterface
{
    public function getTitle() : string {

    }
}

class AtomHeader implements HeaderInterface
{
    public function getTitle() : string {
        
    }
}

// ITEM

interface ItemInterface {
    public function getTitle(): string;
    public function getURL(): string;
    public function getDescription(): string;
}

abstract class Item implements ItemInterface {
    
}

class RssItem extends Item
{
    public function getTitle() : string {
        
    }
    public function getURL() : string {
        
    }
    public function getDescription() : string {
        
    }
}

class AtomItem extends Item
{
    public function getTitle() : string {
        
    }
    public function getURL() : string {
        
    }
    public function getDescription() : string {
        
    }
}

//===========================================
//=== USERLAND (USING THE LIBRARY)
//===========================================

// userland code
$reader = ReaderFactory::get(new FeedSourceURL("website.com/rss-feed"));

//HTML
echo <<< EOT
<html>
    <head>
        <title>{$reader->getHeader()->getTitle()}</title>
    </head>
    <body>
        <h1>{$reader->getHeader()->getTitle()}</h1>
        <?php foreach ($reader->getItems() as $item) { ?>
            <h2><a href='<?= $item->getUrl(); ?>'><?= $item->getTitle() ?></a></h2>
            <p><?= $item->getDescription() ?>
        <?php } ?>
    </body>
</html>
EOT;