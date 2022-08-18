<div class="login-container">
    <div class="login-container-form">
        <h1>Login</h1>
        <div>
            <?php echo $this->Form->create(null, [
                'class' => 'login-form',
                'url' => [
                    'controller' => 'Customer',
                    'action' => 'login',
                ]
            ]); ?>
                <?= $this->Form->control('name') ?>
                <?= $this->Form->control('password') ?>
                <?= $this->Form->button('Login', [
                    'class' => 'login-buttom'
                ]) ?>
            <?= $this->Form->end() ?>
        </div>
        <div>
            <?= $this->Flash->render() ?>
        </div>
    </div>
</div>

