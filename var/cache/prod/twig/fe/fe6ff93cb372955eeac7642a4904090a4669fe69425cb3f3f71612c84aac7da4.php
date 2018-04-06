<?php

/* @Framework/Form/hidden_row.html.php */
class __TwigTemplate_9c2ea4187b081e0c9b3f119d09e41550d09daf282123bfab181deedc3b697922 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php echo \$view['form']->widget(\$form) ?>
";
    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Framework/Form/hidden_row.html.php", "/var/www/DD_projektas/vendor/symfony/framework-bundle/Resources/views/Form/hidden_row.html.php");
    }
}
