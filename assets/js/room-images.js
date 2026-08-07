document.addEventListener('DOMContentLoaded', () => {
  const zone = document.querySelector('[data-upload-zone]');
  const input = document.querySelector('[data-image-input]');
  const previews = document.querySelector('[data-image-previews]');
  const count = document.querySelector('[data-image-count]');
  if (!zone || !input || !previews || !count) return;

  input.name = 'room_images[]';
  input.accept = 'image/jpeg,image/png,image/webp';
  input.multiple = true;

  const placeholders = {room_number:'e.g. 101', room_type:'AC / Non-AC', hostel_block:'Block A', floor:'Floor 1', total_beds:'e.g. 3', fees_per_sem:'e.g. 25000', location:'Location note / remarks'};
  Object.entries(placeholders).forEach(([name, placeholder]) => {
    const field = document.querySelector(`#room-form [name="${name}"]`);
    if (field) field.placeholder = placeholder;
  });
  const statusField = document.querySelector('#room-form [name="room_status"]');
  if (statusField && !statusField.querySelector('option[value="Occupied"]')) {
    const option = new Option('Occupied (calculated automatically)', 'Occupied');
    option.disabled = true;
    statusField.add(option, 1);
  }
  document.querySelectorAll('[data-gallery] img,.existing-images .gallery-item img').forEach(image => image.addEventListener('error', () => image.closest('.gallery-item')?.remove()));

  const existing = () => document.querySelectorAll('.existing-images .gallery-item input:not(:checked)').length;
  const valid = file => ['image/jpeg', 'image/png', 'image/webp'].includes(file.type) && file.size < 5 * 1024 * 1024;
  let files = [];
  const render = () => {
    previews.innerHTML = '';
    files.forEach((file, index) => {
      const card = document.createElement('div');
      card.className = 'preview-card';
      const image = document.createElement('img');
      image.src = URL.createObjectURL(file);
      image.alt = `Selected room image ${index + 1}`;
      image.onload = () => URL.revokeObjectURL(image.src);
      const remove = document.createElement('button');
      remove.type = 'button';
      remove.className = 'preview-remove';
      remove.textContent = '\u00d7';
      remove.setAttribute('aria-label', `Remove selected image ${index + 1}`);
      remove.addEventListener('click', () => { files.splice(index, 1); sync(); });
      card.append(image, remove);
      previews.append(card);
    });
    count.textContent = `${existing() + files.length} of 3 images selected`;
  };
  const sync = () => {
    const transfer = new DataTransfer();
    files.forEach(file => transfer.items.add(file));
    input.files = transfer.files;
    render();
  };
  const add = selected => {
    const incoming = Array.from(selected);
    if (incoming.some(file => !valid(file))) {
      Swal.fire('Invalid image', 'Use JPG, JPEG, PNG or WEBP images smaller than 5 MB.', 'error');
      return;
    }
    if (existing() + files.length + incoming.length > 3) {
      Swal.fire('Maximum reached', 'You can upload a maximum of 3 images per room.', 'error');
      return;
    }
    files.push(...incoming);
    sync();
  };

  // Prevent a click on the drop zone from recursively reopening the file picker.
  zone.addEventListener('click', event => { if (event.target !== input) input.click(); });
  input.addEventListener('click', event => event.stopPropagation());
  zone.addEventListener('dragover', event => { event.preventDefault(); zone.classList.add('dragging'); });
  zone.addEventListener('dragleave', () => zone.classList.remove('dragging'));
  zone.addEventListener('drop', event => { event.preventDefault(); zone.classList.remove('dragging'); add(event.dataTransfer.files); });
  input.addEventListener('change', () => add(input.files));
  document.querySelectorAll('[name="delete_image[]"]').forEach(box => box.addEventListener('change', render));
  render();

  const lightbox = document.querySelector('[data-lightbox]');
  if (lightbox) {
    let images = [];
    let index = 0;
    const show = () => { lightbox.querySelector('img').src = images[index]; };
    document.querySelectorAll('[data-gallery]').forEach(item => item.addEventListener('click', () => {
      images = JSON.parse(item.dataset.gallery);
      index = Number(item.dataset.index);
      show();
      lightbox.hidden = false;
    }));
    lightbox.querySelector('.lightbox-close').onclick = () => { lightbox.hidden = true; };
    lightbox.querySelector('.lightbox-prev').onclick = () => { index = (index + images.length - 1) % images.length; show(); };
    lightbox.querySelector('.lightbox-next').onclick = () => { index = (index + 1) % images.length; show(); };
    lightbox.onclick = event => { if (event.target === lightbox) lightbox.hidden = true; };
  }
});
