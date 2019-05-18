<<<<<<< HEAD
<?php

    
    include "Template-Engine(1.0).php";
    $var1 = 1;
    $var2 = 1;
    $template_engine = new TemplateEngine();
    TemplateEngine::open_tpl($template_engine, 'main-page.tpl');
    if($template_engine->page_content){
        $template_engine->set_values(get_defined_vars());
        echo $template_engine->sdelatsZashibis();
    }


=======
<?php

    
    include "Template-Engine(1.0).php";
    $var1 = 1;
    $var2 = 3;
    $template_engine = new TemplateEngine();
    TemplateEngine::open_tpl($template_engine, 'main-page.tpl');
    if($template_engine->page_content){
        $template_engine->set_values(get_defined_vars());
        echo $template_engine->sdelatsZashibis();
    }


>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
