<?php

/* layout.html.twig */
class __TwigTemplate_e301640c3f2710cdff938c047f851646ca1af2ff00af5774d4a454a74344dd99 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>

<!--
* Copyright Ashvin PAINIAYE ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "
* contact@ashvinpainiaye.com
* www.ashvinpainiaye.com
-->

<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\" />
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
  <meta name=\"author\" content=\"Ashvin PAINIAYE\">
  <title>TAVOITURE.COM</title>
  <!-- Bootstrap Core CSS -->
  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">

<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">

  <!-- Custom CSS -->
  <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\">

  <!-- Custom Fonts Icon-->
  <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
</head>
<body style=\"margin-top:50px;\">
  ";
        // line 33
        $this->displayBlock('navbar', $context, $blocks);
        // line 61
        echo "
  ";
        // line 62
        $this->displayBlock('header', $context, $blocks);
        // line 81
        echo "
  ";
        // line 82
        $this->displayBlock('body', $context, $blocks);
        // line 84
        echo "
  ";
        // line 85
        $this->displayBlock('footer', $context, $blocks);
        // line 101
        echo "
  <!-- jQuery -->
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js\"></script>

<script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>

  <!-- Bootstrap Core JavaScript -->
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>

  <script>
    \$( function() {
      \$( \".datepicker\" ).datepicker();
    } );
    </script>

</body>
</html>
";
    }

    // line 33
    public function block_navbar($context, array $blocks = array())
    {
        // line 34
        echo "  <!-- DEBUT NAV -->
  <nav class=\"navbar navbar-default navbar-fixed-top\">
    <div class=\"container\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
          <span class=\"sr-only\">Toggle navigation</span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
        </button>
      </div>

      <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
        <ul class=\"nav navbar-nav\">
          <li class=\"active\"><a href=\"/\">Accueil</a></li>
          <li><a href=\"/vehicules\">Les véhicules</a></li>
          <li><a href=\"#\">Contact</a></li>
        </ul>
        <ul class=\"nav navbar-nav navbar-right\">
          <li><a href=\"#\">Connexion</a></li>
          <li><a href=\"#\">Inscription</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- FIN NAV -->
  ";
    }

    // line 62
    public function block_header($context, array $blocks = array())
    {
        // line 63
        echo "  <section style=\"background-color:#3d8c98; height: 80px;\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-md-6\">

          <h1 style=\"margin:0; line-height: 80px; color:#fff;font-family:julius sans one;\">TAVOITURE.COM</h1>
        </div>
        <div class=\"col-md-6\">
          <form style=\"padding-top:24px;\">
            <div class=\"form-group\">
              <input type=\"text\" class=\"form-control\" style=\"border-radius:0; border:none;\" placeholder=\"Search\">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  ";
    }

    // line 82
    public function block_body($context, array $blocks = array())
    {
        // line 83
        echo "  ";
    }

    // line 85
    public function block_footer($context, array $blocks = array())
    {
        // line 86
        echo "  <!-- DEBUT FOOTER -->
  <footer style=\"padding-top: 28px; padding-bottom:20px; background-color:#3d8c98; color:#fff; margin-top:100px;\">
    <div class=\"container text-right\">
      <div class=\"row\">
        <div class=\"col-md-12\">
          <p>
            Copyright &copy; 2017
            <strong>Ashvin PAÏNIAYE</strong>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- FIN FOOTER -->
  ";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 86,  168 => 85,  164 => 83,  161 => 82,  140 => 63,  137 => 62,  107 => 34,  104 => 33,  83 => 101,  81 => 85,  78 => 84,  76 => 82,  73 => 81,  71 => 62,  68 => 61,  66 => 33,  55 => 25,  49 => 22,  29 => 5,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.html.twig", "D:\\wamp64\\www\\SIMPLON\\tavoiture.com\\templates\\layout.html.twig");
    }
}
