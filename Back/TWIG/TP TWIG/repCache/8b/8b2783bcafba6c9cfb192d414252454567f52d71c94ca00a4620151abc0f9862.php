<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.html.twig */
class __TwigTemplate_2431bc45587376f5adf8cfd991c323c242d9feb0dade5f4e60615472c96c492a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'navbar' => [$this, 'block_navbar'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>

<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title> ";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo " </title>

    ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "</head>

<body>

    ";
        // line 19
        $this->displayBlock('navbar', $context, $blocks);
        // line 35
        echo "

    ";
        // line 37
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "
    ";
        // line 41
        $this->displayBlock('javascripts', $context, $blocks);
        // line 45
        echo "
</body>

</html>";
    }

    // line 9
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " Notre site ";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"css/style.css\">
    ";
    }

    // line 19
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "        <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
            <a class=\"navbar-brand\" href=\"#\">Navbar</a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">
                <div class=\"navbar-nav\">
                <a class=\"nav-item nav-link active\" href=\"#\">Home <span class=\"sr-only\">(current)</span></a>
                <a class=\"nav-item nav-link\" href=\"#\">Features</a>
                <a class=\"nav-item nav-link\" href=\"#\">Pricing</a>
                <a class=\"nav-item nav-link disabled\" href=\"#\">Disabled</a>
                </div>
            </div>
        </nav>
    ";
    }

    // line 37
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "
    ";
    }

    // line 41
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "    <script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
    <script src=\"js/app.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  137 => 42,  133 => 41,  128 => 38,  124 => 37,  106 => 20,  102 => 19,  96 => 12,  92 => 11,  85 => 9,  78 => 45,  76 => 41,  73 => 40,  71 => 37,  67 => 35,  65 => 19,  59 => 15,  57 => 11,  52 => 9,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html.twig", "C:\\wamp64\\www\\Formation\\Back\\TWIG\\TP TWIG\\templates\\layout.html.twig");
    }
}
