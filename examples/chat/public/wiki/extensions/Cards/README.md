Cards Extension
========================

The Cards extension receives a list of articles and outputs standardized
(across extensions) cards.

Rationale
------------

We - the Reading Web team found ourselves displaying page titles and their
descriptions in multiple extensions 
([MobileFrontend](https://www.mediawiki.org/wiki/Extension:MobileFrontend) -
watchlist, search results,
[RelatedArticles](https://www.mediawiki.org/wiki/Extension:RelatedArticles) -
read more, 
[Gather](https://www.mediawiki.org/wiki/Extension:Gather), etc.)
and decided to create this extension
to ease our development and maintenance of this feature. Currently the Cards
extension is used by the RelatedArticles extension, but we plan on making this
extension to serve multiple purposes and be useful in different parts of the
reading experience.

Installation
------------

Add the following to your LocalSettings.php file: `wfLoadExtension( 'Cards' );`


How to use
------------

```js
mw.loader.using( 'ext.cards' ).done( function () {

	var gateway = new mw.cards.CardsGateway( { api: new mw.Api() } );

	// 'Book' and 'Phone' are page titles, 200 is the thumbnail width in pixels
	gateway.getCards( ['Book', 'Phone'], 200 ).done( function( cards ) {
	    $( '#bodyContent' ).append( cards.$el );
	} );
} );
```
