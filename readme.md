## How to start

<p>composer install</p>
<p>cp .env.example .env</p>
<p>php artisan key:generate</p>
<p>Внести настройки бд в .env</p>

## How deleting "dead" notes works

<p> При создании или редактировании заметки заполняется поле "deathdata" заметки, в котором указывается дата до которой заметка считается актуальной. При запросе в бд дополнительным условием ставится что бы текущая дата была меньше даты в поле "deathdata". И раз в день Sheduler делает выборку заметок у которых уже истек срок жизни. Таким образом нет большого количества запросов, что благоприятно работает как на ресурсы сервера так и на затраты клиента на каждый запрос в бд. Вариант что бы  Sheduler делал выборку ежеминутно заметок с истекшим сроком жизни показался мне слишком затратным и неправильным </p>
