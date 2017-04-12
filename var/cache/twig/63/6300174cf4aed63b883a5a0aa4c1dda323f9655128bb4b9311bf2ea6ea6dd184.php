<?php

/* list-car.html.twig */
class __TwigTemplate_b51056f5e592b8e25acd909d2658ab4282376a9f5b8986defce0fff38b050a87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "list-car.html.twig", 1);
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
        echo "<style>
select{
  margin:auto 5px;
  border-radius:0 !important;
}
</style>
<div class=\"container text-center\" style=\"margin:50px auto;\">
  <div class=\"row\">
    <div class=\"col-md-12\">
      <form class=\"form-inline\">
        <div class=\"form-group\">

          <select class=\"form-control\" name=\"type\" method=\"POST\">
            <option disabled selected>Types</option>
            ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["types"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 19
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["type"], "id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["type"], "name", array(), "array"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "          </select>

        </div>
        <div class=\"form-group\">
          <select class=\"form-control\" name=\"brand\">
            <option disabled selected>Marques</option>
            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["brands"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 28
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["brand"], "name", array(), "array"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "          </select>

        </div>

        <div class=\"form-group\">
          <select class=\"form-control\" name=\"modele\">
            <option disabled selected>Modele</option>
            ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["models"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["model"]) {
            // line 38
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["model"], "id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["model"], "name", array(), "array"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['model'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "          </select>

        </div>

        <div class=\"form-group\">
          <select class=\"form-control\" name=\"fuel\">
            <option disabled selected>Carburant</option>
            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fuels"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["fuel"]) {
            // line 48
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["fuel"], "id", array(), "array"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["fuel"], "name", array(), "array"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fuel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "          </select>

        </div>

        <button type=\"submit\" class=\"btn btn-default\" style=\"border-radius:0; background-color:#7e7f7e;border-color:#7e7f7e; color:#fff;\"><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span></button>

      </form>
    </div>
  </div>
</div>





<style>
h5,h6{
  color: #495a61;
}
h5{
  font-weight: bold;
}
.prix {
  font-size:32px;
  color: #3d8c98;
}
.prix-j{
  font-size:20px;
}

.btn-details{
  background-color: #f0716c;
  border-color: #f0716c;
  color: #fff;
  border-radius:0;
  padding: 10px 25px 10px 25px;
}
</style>
<div class=\"container\">
  <div class=\"row\">

  ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cars"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 92
            echo "

  <div class=\"col-md-4\" style=\"margin-bottom: 30px;\">
    <img src=\"images/1.jpg\" alt=\"header\" class=\"img-responsive\">
    <div style=\"padding:10px; border:1px solid #ddd; border-top:none;\">
      <h5><i class=\"fa fa-car\" style=\"margin-right:5px\"></i> BMW - M4</h5>
      <h6><i class=\"fa fa-map-marker\" style=\"margin-right:5px\"></i> ";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "city", array(), "array"), "html", null, true);
            echo "</h6>

      <div class=\"row\">
        <div class=\"col-md-8\">
          <span class=\"prix\">";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "price", array(), "array"), "html", null, true);
            echo "€<span class=\"prix-j\">/jour</span></span>
        </div>


        <div class=\"col-md-4\">

          <a href=\"/vehicule/details/";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "id", array(), "array"), "html", null, true);
            echo "\" class=\"pull-right btn btn-default btn-details\">Détails</a>
        </div>

      </div>

    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "



</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "list-car.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 116,  204 => 108,  195 => 102,  188 => 98,  180 => 92,  176 => 91,  133 => 50,  122 => 48,  118 => 47,  109 => 40,  98 => 38,  94 => 37,  85 => 30,  74 => 28,  70 => 27,  62 => 21,  51 => 19,  47 => 18,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "list-car.html.twig", "D:\\wamp64\\www\\SIMPLON\\tavoiture.com\\templates\\list-car.html.twig");
    }
}
