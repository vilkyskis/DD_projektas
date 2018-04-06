<?php

/* @Framework/Form/choice_options.html.php */
class __TwigTemplate_9c0743e4e1cf8ea1acbfd020bd17c9f8456ce9a5918555ccd2ce4b3c981e2bdd extends Twig_Template
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
        echo "<?php echo \$view['form']->block(\$form, 'choice_widget_options') ?>
";
    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_options.html.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Framework/Form/choice_options.html.php", "/var/www/DD_projektas/vendor/symfony/framework-bundle/Resources/views/Form/choice_options.html.php");
    }
}
