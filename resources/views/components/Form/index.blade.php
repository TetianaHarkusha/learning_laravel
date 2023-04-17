@props(['input'])
<form {{$attributes}}>
    @csrf
    <x-form.input type="text" name="id" placeholder="Не заповнюється" :value="$record->id ?? ''" add="readonly">
        Ідентифікатор:
    </x-form.input>
    <x-form.input type="text" name="name" placeholder="Введіть ім'я та прізвище через пропуск" :value="$record->name ?? ''" >
        Ім'я:
    </x-form.input>
    <x-form.input type="email" name="email" placeholder="Введіть електронну адресу" :value="$record->email ?? ''" >
        mail:
    </x-form.input>
    <x-form.input type="text" name="age" placeholder="Введіть вік" :value="$record->age ?? ''" >
        Вік:
    </x-form.input>
    <x-form.input type="text" name="salary" placeholder="Введіть заробітну плату" :value="$record->salary ?? ''" >
        Заробітна плата:
    </x-form.input>
    <button type="submit" class="btn btn-success">Надіслати</button>
</form>