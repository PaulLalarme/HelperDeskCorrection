<?php
// src/Form/TicketType.php
namespace App\Form;

use App\Entity\Ticket;
use App\Enum\Status;
use App\Enum\Priority;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('priorite', ChoiceType::class, [
                'choices'  => Priority::cases(),
                'choice_label' => fn(Priority $p) => $p->name,     // ou $p->value
                'choice_value' => fn(?Priority $p) => $p?->value,
            ])
            ->add('statut', ChoiceType::class, [
                'choices'       => Status::cases(),
                'choice_label'  => fn(Status $s) => $s->name,
                'choice_value'  => fn(?Status $s) => $s?->value,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
