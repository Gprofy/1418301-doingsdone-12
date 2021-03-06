<section class="content__side">
      <?=$menu?>
    </section>

    <main class="content__main">
        <h2 class="content__main-heading">Добавление проекта</h2>

        <form class="form" action="" method="post" autocomplete="off">
          <div class="form__row">
            <label class="form__label" for="project_name">Название <sup>*</sup></label>

            <input class="form__input<?php if (isset($errors['project_title'])): ?> form__input--error<?php endif; ?>" type="text" name="name" id="project_name" value="<?=getPostVal('name')?>" placeholder="Введите название проекта">

            <?php if (isset($errors['project_title'])): ?><p class="form__message"><?=$errors['project_title']?></p><?php endif; ?>
          </div>

          <div class="form__row form__row--controls">
            <?php if (count($errors) > 0 ): ?><p class="error-message">Пожалуйста, исправьте ошибки в форме</p><?php endif; ?>

            <input class="button" type="submit" name="add" value="Добавить">
          </div>
        </form>
      </main>