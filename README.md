# php-sms-gateway
کد های ارسال اس ام اس با استفاده از  PHP

## پنل ها
۱- ۲۹۷۲.ir

## مستندات
شما می توانید به راحتی پنل های دیگر را به این سیستم اضافه کنید.

###فایل config.php
در این فایل شما اطلاعات فایلی پنل را تنظیم میکنید:

return [
    'sms2972'=>['sms2972.php','sms2972'],
    'kavehnegar'=>['kavehnegar.php','kavehnegar']
];

در این آرایه ایندکس های اول نشان دهنده نام پنل است و این پس شما در کدها با این نام سروکار دارید.

هر ایندکس دارای ۲ زیر شاخه است که اولی نشان دهنده مسیر فایل مربوط به کدهای برنامه نویسی است و دومی نام کلاسی است سیستم با آن سروکار دارد.

### فایل init.php
در این فایل کلاس های اصلی برنامه قرار دارند:

کلاس AbstSMS : هر وقت بخواهید پنل جدیدی به سیستم اضافه کنید باید کلاسی تعریف کنید که از این کلاس ارث ببرد.

کلاس SMS : اگر بخواهید در پروژه های خود اس ام اس ارسال کنید باید از این کلاس استفاده کنید.

کلاس iSMS: این کلاس حاوی تمامی پارامتر های یک اس ام اس می باشد. مثلا فرستنده و گیرنده و متن اس ام اس از پارامترهای این کلاس است.

## License

The PHP additional functions is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
