<form id="contactForm">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <button type="submit">Submit</button>
</form>

<!-- Добавляем JavaScript код для обработки AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
            event.preventDefault(); // Останавливаем стандартную отправку формы

            let formData = {
                _token: $('input[name=_token]').val(), // Получаем CSRF-токен
                name: $('#name').val(),
                phone: $('#phone').val(),
                email: $('#email').val()
            };

            $.ajax({
                url: '/submit',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert('Форма успешно отправлена!'); // Уведомление об успешной отправке

                    // Очищаем форму
                    $('#contactForm')[0].reset();
                },
                error: function(xhr) {
                    alert('Ошибка отправки данных.'); // Уведомление об ошибке
                }
            });
        });
    });
</script>
