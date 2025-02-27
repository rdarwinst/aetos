<div class="mb-3">
    <label for="name" class="form-label">Service Name</label>

    <input
        type="text"
        name="service[name]"
        id="name"
        placeholder="Ex. UX / UI"
        value="<?php echo s($services->name); ?>"
        class="form-control rounded-0 <?php echo isset($errores['name']) ? 'is-invalid' : ''; ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['name'] ?? 'Please enter a service name.'; ?></div>
    <div class="nameHelpBlock form-text">Enter the name of the service to register.</div>
</div><!-- .mb-3 -->
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea
        name="service[description]"
        id="description"
        rows="3"
        placeholder="Ex. Brand Concept, Web Development"
        class="form-control rounded-0 <?php echo isset($errores['description']) ? 'is-invalid' : ''; ?>" required><?php echo s($services->description); ?></textarea>
    <div class="invalid-feedback"><?php echo $errores['description'] ?? 'Please enter a description or features of the service.'; ?></div>
    <div class="descriptionHelpBlock form-text">Enter the description or features of the service, separating each by commas.</div>
</div><!-- .mb-3 -->
<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input
        type="file"
        name="service[image]"
        id="image"
        class="form-control rounded-0 <?php echo isset($errores['image']) ? 'is-invalid' : ''; ?>"
        accept="image/jpeg, image/png">
    <div class="invalid-feedback"><?php echo $errores['image'] ?? 'Please upload an image of the service.'; ?></div>
    <div class="imageHelpBlock form-text">Upload an image of the service. Accepted formats: JPG, PNG.</div>
</div>
<?php if ($services->image): ?>
    <div class="mb-3">
        <p class="bg-white text-uppercase fw-bold text-dark text-center">Actual Image</p>
        <img src="/uploads/images/<?php echo s($services->image); ?>" alt="<?php echo s($services->name); ?> Image" class="img-fluid">
    </div>
<?php endif; ?>