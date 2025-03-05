<div class="mb-3">
    <label for="title" class="form-label">Title for Slide</label>

    <input
        type="text"
        name="slider[title]"
        id="title"
        value="<?php echo s($slider->title); ?>"
        placeholder="Ex. Trident"
        class="form-control rounded-0 fw-lighter <?php echo isset($errores['title']) ? 'is-invalid' : ''; ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['title'] ?? 'You must add a title'; ?></div>
    <div class="titleHelpBlock form-text">The title should be a single word.</div>
</div>
<div class="mb-3">
    <label for="image" class="form-label">Icon</label>

    <input
        type="file"
        name="slider[image]"
        id="image"
        class="form-control rounded-0 fw-lighter <?php echo isset($errores['image']) ? 'is-invalid' : ''; ?>"
        accept="image/png">
    <span class="invalid-feedback"><?php echo ($errores['image']) ?? 'Please upload an image for the slide.'; ?></span>
    <div class="imageHelpBlock form-text">The input type submit expects images in PNG format.</div>
</div>
<?php if($slider->image): ?>
    <div class="mb-3 bg-primary">
        <p class="text-dark fw-bold text-center text-uppercase py-2">Actual Image</p>
        <img src="/uploads/images/<?php echo s($slider->image); ?>" alt="" class="img-fluid">
    </div>
<?php endif; ?>