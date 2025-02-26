<div class="mb-3">
    <label for="section" class="form-label">Section</label>

    <input type="text" name="about[section]" id="section" value="<?php echo s($about->section); ?>" class="form-control rounded-0 <?php echo isset($errores['section']) ? 'is-invalid' : ''; ?>" placeholder="Ex. Social Networks" required>

    <div class="invalid-feedback"><?php echo $errores['section'] ?? 'The title cannot be empty. Please provide a title for this section.'; ?></div>
    <div class="sectionHelpBlock form-text">Please enter a title for this section. It will help identify the content clearly.</div>
</div>

<div class="mb-3">
    <label for="title" class="form-label">Title</label>

    <input type="text" name="about[title]" id="title" value="<?php echo s($about->title); ?>" class="form-control rounded-0 <?php echo isset($errores['title']) ? 'is-invalid' : ''; ?>" placeholder="Ex. Instagram" required>

    <div class="invalid-feedback"><?php echo $errores['title'] ?? 'The title cannot be empty. Please provide a title.'; ?></div>
    <div class="titleHelpBlock form-text">Please enter a title for this section. It will help identify the content clearly.</div>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Content</label>

    <textarea name="about[content]" id="content" required rows="5" class="form-control rounded-0 <?php echo isset($errores['content']) ? 'is-invalid' : ''; ?>" placeholder="Ex. https://www.instagram.com/"><?php echo s($about->content); ?></textarea>

    <div class="invalid-feedback"><?php echo $errores['content'] ?? 'The content cannot be empty. Please provide text for this section.'; ?></div>
    <div class="contentHelpBlock form-text">Please enter the text for this section. This will provide the main information.</div>
</div>