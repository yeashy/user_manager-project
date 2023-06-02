<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Обращение</h4>
        <div class="mb-3 form-floating">
            <input
                type="text"
                class="form-control"
                id="subject"
                placeholder="Тема письма"
                name="subject"
                required
                value="{{$appeal->subject}}"
                disabled
            >
            <label for="subject">Тема письма</label>
        </div>
        <div class="mb-3 form-floating">
                        <textarea
                            class="form-control"
                            placeholder="Введите текст обращения..."
                            id="text"
                            name="text"
                            style="height: 200px"
                            disabled
                        >{{$appeal->text}}</textarea>
            <label for="text">Текст обращения</label>
        </div>
        <div class="mb-3 form-floating">
            <input
                type="email"
                class="form-control"
                id="email_to"
                placeholder="example@email.com"
                name="email_to"
                required
                value="{{$appeal->email_to}}"
                disabled
            >
            <label for="email_to">E-mail, на который отправить ответ</label>
        </div>
    </div>
</div>
