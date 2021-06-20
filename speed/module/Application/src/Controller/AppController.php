<?php
/**
 * @link        https://publogger.khaleb.dev
 * @copyright   Copyright (c) 2021 Publogger
 * @license     MIT License    
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\View\Model\JsonModel;
use Application\CustomObject\simple_html_dom;
use Application\Entity\Images;
use Application\Entity\Post;
use Application\Entity\PostGroup;
use Application\Entity\PostImages;
use Application\Entity\PostTags;
use Application\Entity\Tags;
use Application\Entity\User;
use Application\Form\TagForm;
use Application\Form\GroupForm;
use Application\Form\PostForm;

class AppController extends AbstractActionController
{
    public function __construct($entityManager, $appManager, $utility)
    {
        $this->entityManager = $entityManager;
        $this->appManager = $appManager;
        $this->utility = $utility;
    }

    public function dashboardAction() : ViewModel
    {
        $this->layout('layout/app');
        return new ViewModel([]);
    }

    public function managePostsAction() : ViewModel
    {
        $this->layout('layout/app');
        return new ViewModel([]);
    }

    public function manageTagsAction() : ViewModel
    {
        $tagId = $this->params()->fromRoute('id', null);
        // load all tags
        if(empty($tagId)){
            $tags = $this->entityManager->getRepository(Tags::class)->findAll();
            
            $template = 'application/app/tags';
            $view = new ViewModel([
                                    'tags' => $tags,
                                    'postCounter' => $this->entityManager->getRepository(PostTags::class)
                                ]);
        }
        else { // load tag by id
            $tag = $this->entityManager->getRepository(Tags::class)->find(intval($tagId));
            $tagCount = $this->entityManager->getRepository(PostTags::class)->countPostByTag($tag);

            $template = 'application/app/tag-data';
            $view = new ViewModel([
                                    'tag' => $tag,
                                    'postCount' => $tagCount['totalPost']
                                ]);
        }
        $this->layout('layout/app');
        $view->setTemplate($template);
        return $view;
    }

    public function manageGroupsAction() : ViewModel
    {
        $groupId = $this->params()->fromRoute('id', null);
        
        if(empty($groupId)){ // load all groups
            $groups = $this->entityManager->getRepository(PostGroup::class)->findAll();
            
            $template = 'application/app/groups';
            $view = new ViewModel([
                                    'groups' => $groups,
                                    'entityPost' => $this->entityManager->getRepository(Post::class)
                                ]);
        }
        else { // load group by id
            $group = $this->entityManager->getRepository(PostGroup::class)->find($groupId);
            $postCount = count($this->entityManager->getRepository(Post::class)->findBy(['group' => $group, 'isDeleted' => false, 'isPublished' => true]));

            $template = 'application/app/group-data';
            $view = new ViewModel([
                                    'group' => $group,
                                    'postCount' => $postCount
                                ]);
        }
        $this->layout('layout/app');
        $view->setTemplate($template);
        return $view;
    }

    public function authAction() : ViewModel
    {
        $this->layout('layout/auth');
        return new ViewModel([]);
    }

}