<?php

/* cars_model/_delete_form.html.twig */
class __TwigTemplate_01637c14a96742eb85a67d07ee2cd38a84ca68a294efb5d4faa244781b8c24d5 extends Twig_Template
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
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cars_model_delete", array("id" => twig_get_attribute($this->env, $this->source, ($context["cars_model"] ?? null), "id", array()))), "html", null, true);
        echo "\" onsubmit=\"return confirm('Are you sure you want to delete this item?');\">
    <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, ($context["cars_model"] ?? null), "id", array()))), "html", null, true);
        echo "\">
    <button class=\"btn\">Delete</button>
</form>";
    }

    public function getTemplateName()
    {
        return "cars_model/_delete_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "cars_model/_delete_form.html.twig", "/var/www/DD_projektas/templates/cars_model/_delete_form.html.twig");
    }
}
