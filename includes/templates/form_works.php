<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" required name="work[title]" value="<?php echo s($work->title); ?>" id="title" placeholder="Ex. Work 1" class="form-control rounded-0 <?php echo isset($errores['title']) ? 'is-invalid' : ''; ?>">
    <div class="invalid-feedback"><?php echo $errores['title'] ?? 'This field cannot be empty. Please provide a title.'; ?></div>
    <div class="brandHelpBlock form-text">Please enter the project name.</div>
</div>
<div class="mb-3">
    <label for="brand" class="form-label">Brand</label>
    <input type="text" required name="work[brand]" value="<?php echo s($work->brand); ?>" id="brand" placeholder="Ex. GrupoApp" class="form-control rounded-0 <?php echo isset($errores['brand']) ? 'is-invalid' : ''; ?>">
    <div class="invalid-feedback"><?php echo $errores['brand'] ?? 'This field cannot be empty. Please provide a brand name.'; ?></div>
    <div class="brandHelpBlock form-text">Please enter the brand name of the product or service.</div>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="work[description]" required id="description" rows="3" class="form-control rounded-0 <?php echo isset($errores['description']) ? 'is-invalid' : ''; ?>" placeholder="Ex. Designed a new logo and developed brand guidelines."><?php echo $work->description; ?></textarea>
    <div class="invalid-feedback">
        <?php echo $errores['description'] ?? 'This field cannot be empty. Please provide a description of the work done.'; ?>
    </div>
    <div class="descriptionHelpBlock form-text">Please provide a detailed description of the work</div>
</div>
<div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" required name="work[country]" value="<?php echo s($work->country); ?>" id="country" placeholder="Ex. Colombia" class="form-control rounded-0 <?php echo isset($errores['country']) ? 'is-invalid' : ''; ?>">
    <div class="invalid-feedback"><?php echo $errores['country'] ?? 'This field cannot be empty. Please select a country.'; ?></div>
    <div class="countryHelpBlock form-text">Please select the country where the service was provided.</div>
</div>

<div class="mb-3">
    <label for="service" class="form-label">Services</label>
    <select name="work[service]" required id="service" aria-label="Services provided" class="form-select rounded-0 <?php echo isset($errores['service']) ? 'is-invalid' : ''; ?>">
        <option value="" selected disabled>Select a service</option>
        <?php foreach ($services as $service): ?>
            <option <?php echo $work->service == $service->id ? 'selected' : ''; ?> value="<?php echo s($service->id); ?>"><?php echo s($service->name); ?></option>


        <?php endforeach; ?>
    </select>
    <div class="invalid-feedback"><?php echo $errores['service'] ?? 'Please select at least one service.'; ?></div>
    <div class="serviceHelpBlock form-text">Please select the services that were provided.</div>

</div>

<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="work[image]" id="image" class="form-control rounded-0 <?php echo isset($errores['image']) ? 'is-invalid' : ''; ?>" accept="image/jpeg, image/png">
    <div class="invalid-feedback"><?php echo $errores['image'] ?? 'This field cannot be empty. Please upload an image.'; ?></div>
    <div class="imageHelpBlock form-text">Please upload an image related to the service provided.</div>
</div>

<?php if ($work->image): ?>

    <div class="mb-3">
        <img src="/uploads/images/<?php echo s($work->image); ?>" alt="Actual Image for <?php echo s($work->title); ?>" class="img-fluid object-fit-cover">
    </div>

<?php endif; ?>