<?php

/* cars_brand/new.html.twig */
class __TwigTemplate_226c05ec736b6c0fb59c80bdd207820bb38c335cd6376e22a89f19e32fcb80ba extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "cars_brand/new.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "New CarsBrand";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Create new CarsBrand</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "cars_brand/_form.html.twig");
        echo "

    <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cars_brand_index");
        echo "\">back to list</a>
";
    }

    public function getTemplateName()
    {
        return "cars_brand/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 10,  46 => 8,  42 => 6,  39 => 5,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "cars_brand/new.html.twig", "/var/www/DD_projektas/templates/cars_brand/new.html.twig");
    }
}
