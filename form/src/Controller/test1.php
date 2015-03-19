<?php
namespace Drupal\form\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class test1 extends ControllerBase
{
	public function ShowPage()
	{
		$form = \Drupal::formBuilder()->getForm(	new Form());

		$markup = [
			'#theme' =>'test1',
			'#title' => 'This is a title coming form test1::ShowPage',
			'#form' => $form;
		];

		return $markup;
	}
}

class Form extends FormBase
{
	public function getFormId()
	{
		return 'form4';
	}

	public function buildForm(	array $form, FormStateInterface $form_state)
	{
		$form['email'] = [
			'#type' => 'textfield',
			'#title' => $this->t(	'input Email'),
			'#default_value' => \Drupal::state()->get('third.email'),
		];

		$form['password'] = [
			'#type' => 'textfield',
			'#title' => $this-t(	'Input your Password'),
			'#default_value' => \Drupal::state()->get('third.email'),
		];

		$form['action']['submit'] = [
			'#type' => 'submit',
			'#value' => 'SUBMIT NOW',
			'#prefix' => 'div class="submit-button">',
			'#suffix' => '</div>',
		];

		return $form;
	}

	public function validateForm(array &$form, FormStateInterface $form_state)
	{
		$email = $form_state->getValue('email');
        $re = preg_match("/^[a-zA-Z0-9][a-zA-Z0-9]{3,}@[a-zA-Z0-9]{3,}\.[a-zA-Z0-9]{2,}$/", $email);
        if ( ! $re ) {
            $form_state->setErrorByName(
                '#page4',
                "Wrong Email Format"
            );
        }
    }

    public function submitForm( array &$form, FormStateInterface $form_state ) {
        $email = $form_state->getValue( 'email' );
        \Drupal::state()->set( 'third.email', $email );
    }
}
