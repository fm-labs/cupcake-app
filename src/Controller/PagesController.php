<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
//use Cupcake\Controller\DisplayPageTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class PagesController extends AppController
{
    //use DisplayPageTrait;


    /**
     * Displays a view
     *
     * @return void|\Cake\Http\Response
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        /** @var \Cake\Controller\Controller $controller */
        $controller = $this;
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $controller->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $controller->set(compact('page', 'subpage'));
        $controller->viewBuilder()->setTemplatePath('Pages');
        //$controller->viewBuilder()->setTheme('ThemeBanana');

        try {
            $controller->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}
