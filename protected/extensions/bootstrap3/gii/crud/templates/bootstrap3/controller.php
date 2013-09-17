<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{
	/**
     * Uncomment the following line,  if you want to use different layout.
     *
	 * @var string
	 */
	//public $layout = '';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',  // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.

	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow admin user to perform 'admin' and 'delete' actions
				'actions'  => array('*'),
				'users'  => array('@'),
			),
			array('deny',
				'users'  => array('?'),
			)
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();  // clear any default values

		if (isset($_GET['<?php echo $this->modelClass; ?>'])) {
			$model->attributes = $_GET['<?php echo $this->modelClass; ?>'];
        }

		$this->render('index', array(
			'model'  => $model,
		));
	}

	/**
	 * Creates a new model from _form.
	 */
	public function actionNew()
	{
		$model = new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
            $transaction = Yii::app()->db->beginTransaction();

            try {
                if(!$model->save()) {
                    throw new Exception();
                }

                $transaction->commit();

                Yii::app()->user->setFlash('success', '<h4>Sikeres mentés!</h4> <p>Sikeresen elmentette az új adatokat!</p>');
				$this->redirect(array('edit', 'id'  => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			} catch (Exception $e) {
                $transaction->rollback();
            }
		}

		$this->render('new', array(
			'model'  => $model,
		));
	}

	/**
	 * Updates a particular model from _form.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionEdit($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
            $transaction = Yii::app()->db->beginTransaction();

            try {
                if(!$model->save()) {
                    throw new Exception();
                }

                $transaction->commit();
                
                Yii::app()->user->setFlash('success', '<h4>Sikeres mentés!</h4> <p>Sikeresen módosította az adatokat!</p>');
				$this->redirect(array('edit', 'id'  => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			} catch (Exception $e) {
                $transaction->rollback();
            }
		}

		$this->render('edit', array(
			'model'  => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful,  the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

        Yii::app()->user->setFlash('success', '<h4>Sikeres törlés!</h4> <p>Sikeresen törölte a sort!</p>');
		// if AJAX request (triggered by deletion via admin grid view),  we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found,  an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return <?php echo $this->modelClass; ?> the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = <?php echo $this->modelClass; ?>::model()->findByPk($id);

		if ($model === null) {
			throw new CHttpException(404, 'A keresett oldal nem létezik.');
		}

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param <?php echo $this->modelClass; ?> $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === '<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
