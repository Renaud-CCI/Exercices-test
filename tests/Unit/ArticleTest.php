<?php
	
use PHPUnit\Framework\TestCase; 
use ExercicesPHPUnit\class\App\Article;

class ArticleTest extends \PHPUnit\Framework\TestCase {

	protected $article;

	public function testTitleIsEmptyByDefault() {
        $article = new Article();
        $this->assertEmpty($article->getTitle());
    }

    public function testSlugIsEmtpyWithNoTitle() {
        $article = new Article();
        $this->assertEmpty($article->getSlug());
    }

    public static function provider() {
    	return array(
    		"testSlugHasSpacesReplacedByUnderscores" => array("An example article", "An_example_article"),
    		"testSlugHasWhitespaceReplaceBySingleUnderscore" => array("An     example  \n   article", "An_example_article"),
    		"testSlugdoesNotStartOrEndWithAnUnderscore" => array(" An example article ", "An_example_article"),
    		"testSlugDoesNotHaveAnyNonWordCharacters" => array("Read! This! Now!", "Read_This_Now"),
    	);
    }

    /**
     * @dataProvider provider
     * @Description("La méthode testSlug prend deux paramètres : $title et $slug qui sont définis dans la méthode provider.
     * Cela représente un test de données multiples correspondant à chaque paire de données dans le tableau retourné par la méthode provider.)
     * 
     * Cela permet de tester plusieurs cas de test avec une seule méthode de test. 
     * Assez pratique pour tester des cas de test similaires.")
     * @param string $title
     * @param string $slug
     */
    public function testSlug($title, $slug)
    {
        $article = new Article();
        $article->title = $title;
        $this->assertEquals($slug, $article->getSlug());
    }
}
