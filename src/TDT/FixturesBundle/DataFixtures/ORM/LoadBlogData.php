<?php

namespace TDT\FixturesBundle\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;
use TDT\BlogBundle\Entity\Article;
use TDT\BlogBundle\Entity\Tag;

class LoadBlogData extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $user = $em->getRepository('TDTUserBundle:User')->findOneBy([], ['id' => 'ASC']);

        $tag1 = new Tag('PHP');
        $tag2 = new Tag('Symfony2');
        $tag3 = new Tag('jQuery');
        $tag4 = new Tag('Linux');

        $article = new Article();
        $article->setTitle('Первая статья')
            //->setEnabled(false)
            ->setSlug('first')
            ->setAnnotation('Аннотация для первой статьи.')
            ->setText('С точки зрения банальной эрудиции каждый индивидуум, критически мотивирующий абстракцию, не может игнорировать критерии утопического субъективизма, концептуально интерпретируя общепринятые дефанизирующие поляризаторы, поэтому консенсус, достигнутый диалектической материальной классификацией всеобщих мотиваций в парадогматических связях предикатов, решает проблему усовершенствования формирующих геотрансплантационных квазипузлистатов всех кинетически коррелирующих аспектов. Исходя из этого, мы пришли к выводу, что каждый произвольно выбранный предикативно абсорбирующий объект.')
            ->setAuthor($user)
            ->addTag($tag1)
            ->addTag($tag2)
        ;
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Вторая статья')
            ->setSlug('second')
            ->setAnnotation('Аннотация для второй статьи.')
            ->setText('Сервисная стратегия деятельно искажает продвигаемый медиаплан, опираясь на опыт западных коллег. Внутрифирменная реклама, согласно Ф.Котлеру, откровенно цинична. Торговая марка исключительно уравновешивает презентационный материал, полагаясь на инсайдерскую информацию. Наряду с этим, узнавание бренда вполне выполнимо. Организация слубы маркетинга, согласно Ф.Котлеру, усиливает фактор коммуникации, осознавая социальную ответственность бизнеса. Экспертиза выполненного проекта восстанавливает потребительский презентационный материал, полагаясь на инсайдерскую информацию.')
            ->setAuthor($user)
            ->addTag($tag3)
        ;
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Третья статья')
            ->setSlug('third')
            ->setAnnotation('Аннотация для третьей статьи.')
            ->setText('Опросная анкета упорядочивает из ряда вон выходящий портрет потребителя, учитывая результат предыдущих медиа-кампаний. Спонсорство, в рамках сегодняшних воззрений, однородно стабилизирует принцип восприятия, используя опыт предыдущих кампаний. Узнавание бренда осмысленно переворачивает повторный контакт, признавая определенные рыночные тенденции. Стимулирование сбыта амбивалентно.')
            ->setAuthor($user)
        ;
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Четвертая статья')
            ->setSlug('fourth')
            ->setAnnotation('Аннотация для четвертой статьи.')
            ->setText('Взаимодействие корпорации и клиента амбивалентно. Агентская комиссия специфицирует мониторинг активности, используя опыт предыдущих кампаний. Ассортиментная политика предприятия развивает стратегический маркетинг, используя опыт предыдущих кампаний. Более того, взаимодействие корпорации и клиента искажает бренд, расширяя долю рынка.')
            ->setAuthor($user)
            ->addTag($tag2)
            ->addTag($tag4)
        ;
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Пятая статья')
            ->setSlug('fifth')
            ->setAnnotation('Аннотация для пятой статьи.')
            ->setText('Взаимодействие корпорации и клиента амбивалентно. Агентская комиссия специфицирует мониторинг активности, используя опыт предыдущих кампаний. Ассортиментная политика предприятия развивает стратегический маркетинг, используя опыт предыдущих кампаний. Более того, взаимодействие корпорации и клиента искажает бренд, расширяя долю рынка.')
            ->setAuthor($user)
            ->addTag($tag2)
            ->addTag($tag4)
        ;
        $manager->persist($article);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
