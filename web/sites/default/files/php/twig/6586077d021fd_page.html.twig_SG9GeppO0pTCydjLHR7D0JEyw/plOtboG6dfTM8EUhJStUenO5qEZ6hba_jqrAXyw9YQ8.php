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

/* themes/custom/yummy_theme/templates/page.html.twig */
class __TwigTemplate_0db7dfedc69d943699afc4e8530728c2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'navbar' => [$this, 'block_navbar'],
            'main' => [$this, 'block_main'],
            'header' => [$this, 'block_header'],
            'highlighted' => [$this, 'block_highlighted'],
            'content' => [$this, 'block_content'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        $context["container"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 54), "fluid_container", [], "any", false, false, true, 54)) ? ("container-fluid") : ("container"));
        // line 56
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 56) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 56))) {
            // line 57
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 94
        echo "
";
        // line 96
        $this->displayBlock('main', $context, $blocks);
        // line 160
        echo "
";
        // line 161
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 161)) {
            // line 162
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 57
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "    ";
        // line 59
        $context["navbar_classes"] = [0 => "navbar", 1 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 61
($context["theme"] ?? null), "settings", [], "any", false, false, true, 61), "navbar_inverse", [], "any", false, false, true, 61)) ? ("navbar-inverse") : ("navbar-default")), 2 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 62
($context["theme"] ?? null), "settings", [], "any", false, false, true, 62), "navbar_position", [], "any", false, false, true, 62)) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 62), "navbar_position", [], "any", false, false, true, 62), 62, $this->source)))) : (($context["container"] ?? null)))];
        // line 65
        echo "    <header";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "addClass", [0 => ($context["navbar_classes"] ?? null)], "method", false, false, true, 65), 65, $this->source), "html", null, true);
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 66
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 66)) {
            // line 67
            echo "        <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 67, $this->source), "html", null, true);
            echo "\">
      ";
        }
        // line 69
        echo "      <div class=\"navbar-header\">
        ";
        // line 70
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
        echo "
        ";
        // line 72
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 72)) {
            // line 73
            echo "          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-expanded=\"false\">
            <span class=\"sr-only\">";
            // line 74
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
            echo "</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
        ";
        }
        // line 80
        echo "      </div>

      ";
        // line 83
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 83)) {
            // line 84
            echo "        <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
          ";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 88
        echo "      ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 88)) {
            // line 89
            echo "        </div>
      ";
        }
        // line 91
        echo "    </header>
  ";
    }

    // line 96
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 97
        echo "  <div role=\"main\" class=\"main-container js-quickedit-main-content\">
    <div class=\"row\">
      <div class=\"container\">

      ";
        // line 102
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 102)) {
            // line 103
            echo "        ";
            $this->displayBlock('header', $context, $blocks);
            // line 108
            echo "      ";
        }
        // line 109
        echo "      <section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 109), 109, $this->source), "html", null, true);
        echo ">

        ";
        // line 112
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 112)) {
            // line 113
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 116
            echo "        ";
        }
        // line 117
        echo "        ";
        // line 118
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 122
        echo "      </section>
      </div>
    </div>
     <div class=\"row-bottom\">
      <div class=\"container\">
      
      ";
        // line 129
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 129)) {
            // line 130
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 135
            echo "      ";
        }
        // line 136
        echo "
      ";
        // line 138
        echo "      ";
        // line 139
        $context["content_classes"] = [0 => (((twig_get_attribute($this->env, $this->source,         // line 140
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 140) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 140))) ? ("col-sm-6") : ("")), 1 => (((twig_get_attribute($this->env, $this->source,         // line 141
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 141) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 141)))) ? ("col-sm-9") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,         // line 142
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 142) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 142)))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 143
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 143)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 143)))) ? ("col-sm-12") : (""))];
        // line 146
        echo "      

      ";
        // line 149
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 149)) {
            // line 150
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 155
            echo "      ";
        }
        // line 156
        echo "      </div>
    </div>
  </div>
";
    }

    // line 103
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 104
        echo "          <div class=\"col-sm-12\" role=\"heading\">
            ";
        // line 105
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 105), 105, $this->source), "html", null, true);
        echo "
          </div>
        ";
    }

    // line 113
    public function block_highlighted($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 114
        echo "            <div class=\"highlighted\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 114), 114, $this->source), "html", null, true);
        echo "</div>
          ";
    }

    // line 118
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 119
        echo "          <a id=\"main-content\"></a>
          ";
        // line 120
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
        echo "
        ";
    }

    // line 130
    public function block_sidebar_first($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 131
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 132
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 150
    public function block_sidebar_second($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 151
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 152
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 162
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 163
        echo "    <footer class=\"region footer\" role=\"contentinfo\">
    <div class=\"footer_box \">
      <div class=\"footer-container ";
        // line 165
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 165, $this->source), "html", null, true);
        echo "\">
        <div class=\"footer_left\">";
        // line 166
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_left", [], "any", false, false, true, 166), 166, $this->source), "html", null, true);
        echo "</div>
        <div class=\"region footer_center\">";
        // line 167
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_center", [], "any", false, false, true, 167), 167, $this->source), "html", null, true);
        echo "</div>
        <div class=\"footer_right\">";
        // line 168
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_right", [], "any", false, false, true, 168), 168, $this->source), "html", null, true);
        echo "</div>
      </div>
    </div>
      ";
        // line 171
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 171), 171, $this->source), "html", null, true);
        echo "
    </footer>
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/yummy_theme/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 171,  317 => 168,  313 => 167,  309 => 166,  305 => 165,  301 => 163,  297 => 162,  290 => 152,  287 => 151,  283 => 150,  276 => 132,  273 => 131,  269 => 130,  263 => 120,  260 => 119,  256 => 118,  249 => 114,  245 => 113,  238 => 105,  235 => 104,  231 => 103,  224 => 156,  221 => 155,  218 => 150,  215 => 149,  211 => 146,  209 => 143,  208 => 142,  207 => 141,  206 => 140,  205 => 139,  203 => 138,  200 => 136,  197 => 135,  194 => 130,  191 => 129,  183 => 122,  180 => 118,  178 => 117,  175 => 116,  172 => 113,  169 => 112,  163 => 109,  160 => 108,  157 => 103,  154 => 102,  148 => 97,  144 => 96,  139 => 91,  135 => 89,  132 => 88,  126 => 85,  123 => 84,  120 => 83,  116 => 80,  107 => 74,  104 => 73,  101 => 72,  97 => 70,  94 => 69,  88 => 67,  86 => 66,  81 => 65,  79 => 62,  78 => 61,  77 => 59,  75 => 58,  71 => 57,  65 => 162,  63 => 161,  60 => 160,  58 => 96,  55 => 94,  51 => 57,  49 => 56,  47 => 54,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/yummy_theme/templates/page.html.twig", "/var/www/html/web/themes/custom/yummy_theme/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 54, "if" => 56, "block" => 57);
        static $filters = array("clean_class" => 62, "escape" => 65, "t" => 74);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 't'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
