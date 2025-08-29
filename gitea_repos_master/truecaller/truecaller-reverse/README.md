# truecaller-reverse

Песочница изучения мобильного приложения Truecaller

## Информация об исследовании (30.06.22)

- 🏗 Версия:
```
12.8.6
```
- 📱 Эмулятор: 
```
Google Nexus 6, Android 6.0 (API 23), Пароль: 1234
```
- 👮 SSL Unpinning: 
```
Magisk+SSLUnpinning 2.0
```
- 🖊 Регистрация: 
```
- Ручная: требуется телефон с onlinesim (3.5р/штука), ручной ввод, аккаунт валидный навсегда
- Автоматическая: требуется телефон с onlinesim (3.5р/штука), создается скриптом, аккаунт валидный сутки
```
- 🗂 Извлечение данных:
```
- token:
/opt/genymobile/genymotion/tools/adb shell 'grep -rsa "\"installationId\"" /data/data/com.truecaller/shared_prefs'
- phone:
9017468457 - телефон с onlinesim, без +7
- deviceId:
/opt/genymobile/genymotion/tools/adb shell 'settings get secure android_id'
```
