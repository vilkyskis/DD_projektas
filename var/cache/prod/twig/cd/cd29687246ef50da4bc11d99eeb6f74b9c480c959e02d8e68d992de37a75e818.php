<?php

/* cars_brand/edit.html.twig */
class __TwigTemplate_fb08ded6ba56f658197ece702392b602437e6b7d3262e177ef34cd245161268a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "cars_brand/edit.html.twig", 1);
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
        echo "Edit CarsBrand";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Edit CarsBrand</h1>

    ";
        // line 8
        echo twig_include($this->env, $context, "cars_brand/_form.html.twig", array("button_label" => "Update"));
        echo "

    <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cars_brand_index");
        echo "\">back to list</a>

    ";
        // line 12
        echo twig_include($this->env, $context, "cars_brand/_delete_form.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "cars_brand/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  51 => 10,  46 => 8,  42 => 6,  39 => 5,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "cars_brand/edit.html.twig", "/var/www/DD_projektas/templates/cars_brand/edit.html.twig");
    }
}
