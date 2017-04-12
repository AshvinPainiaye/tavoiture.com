<?php

/* details-car.html.twig */
class __TwigTemplate_05db706846692d1d5934686afaf43a8d4c2d750fe75918541dd43770c2edd3cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "details-car.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $context["car"] = $this->getAttribute(($context["car"] ?? null), 0, array(), "array");
        // line 6
        echo "
<div class=\"container\">
  <div class=\"row\">

    <div class=\"col-md-12\">
      <h1 class=\"text-center\">BMW - M4</h1>
      <img src=\"/images/1.jpg\" alt=\"header\" class=\"img-responsive\">


      <div class=\"row\" style=\"margin-top:30px;\">
        <div class=\"col-md-8\">
          <div style=\"border:1px solid black; padding:10px;\">

            <div class=\"row\">
              <div class=\"col-md-8\">
                Puissance : ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "horse_power", array(), "array"), "html", null, true);
        echo "ch <br>
                Moteur : ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "engine", array(), "array"), "html", null, true);
        echo "<br>
                Carburant : Essence<br>
                Nombre de place : ";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "nb_place", array(), "array"), "html", null, true);
        echo "<br>
                Etat : ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "etat", array(), "array"), "html", null, true);
        echo "<br>
                Couleur : ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "color", array(), "array"), "html", null, true);
        echo "<br>
              </div>
              <div class=\"col-md-4\">
                ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "address", array(), "array"), "html", null, true);
        echo "<br>
                ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "city", array(), "array"), "html", null, true);
        echo "<br>
                ";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "zip_code", array(), "array"), "html", null, true);
        echo "<br>
              </div>
            </div>
          </div>

        </div>

        <div class=\"col-md-4\">
          <div style=\"border:1px solid black; padding:10px;\">

            <form>
              <div class=\"form-group\">
                <input type=\"text\" class=\"form-control datepicker\" name=\"du\" placeholder=\"du\">
              </div>
              <div class=\"form-group\">
                <input type=\"text\" class=\"form-control datepicker\" name=\"au\" placeholder=\"au\">
              </div>

              ";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute(($context["car"] ?? null), "price", array(), "array"), "html", null, true);
        echo "€<br>

              <button type=\"submit\" class=\"btn btn-default\">Réserver</button>
            </form>


          </div>
        </div>
      </div>


    </div>

  </div>


  <hr>

  <div class=\"row\">
    <div class=\"col-md-12\">

      <h2 class=\"text-center\">Commentaires</h2>


      <div style=\"border:1px solid black; padding:10px; margin-top:20px;\">
        <h5>John Doe | 16/05/2017</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia laboriosam facilis totam atque, beatae. Nihil sit nam tempora cumque?
          Sequi a reprehenderit, accusamus assumenda illum consectetur velit quam cumque veniam!</p>
        </div>

        <div style=\"border:1px solid black; padding:10px; margin-top:20px;\">
          <h5>John Doe | 16/05/2017</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia laboriosam facilis totam atque, beatae. Nihil sit nam tempora cumque?
            Sequi a reprehenderit, accusamus assumenda illum consectetur velit quam cumque veniam!</p>
          </div>

        </div>

      </div>

    </div>
    ";
    }

    public function getTemplateName()
    {
        return "details-car.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 49,  84 => 31,  80 => 30,  76 => 29,  70 => 26,  66 => 25,  62 => 24,  57 => 22,  53 => 21,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "details-car.html.twig", "D:\\wamp64\\www\\SIMPLON\\tavoiture.com\\templates\\details-car.html.twig");
    }
}
