# Coachium (pre-cached)
Web-based software for interfacing with CMA educational interfaces, cached

Recommended for institutions which want to use Coachium in lessons. This cached version has the benefit of being smaller in size, faster to load and able to run offline, as it installs itself into the browser's filesystem upon startup and updates every time.

For more infomation about what Coachium is, please visit the [parent repo](https://github.com/prochazkaml/Coachium).

Our [central instance](https://coachium.prochazka.ml/) has an example running (in Czech by default).

## How to set it up on a server

Since it is a simple static webpage, it is incredibly simple to set up. If you have a Linux server, do the following:

```bash
cd /var/www/html # Or any other directory where your server root is!
git clone https://github.com/prochazkaml/CoachiumCached coachium # Make the downloaded repo lower-case
```

Then, open the file `index.html`, where you will see the following as the first line of actual JavaScript code:

```js
const DEFAULT_LANGUAGE_OVERRIDE = "cs";
```

There, replace `cs` by your preferred language (i.e. `en` – see the [`js/i18n` directory of the parent repo](https://github.com/prochazkaml/Coachium/tree/master/js/i18n) for all supported languages). Save the changes, and Coachium should be ready to use on your server!

**NOTE: DO NOT REMOVE THIS LINE, EVEN IF YOU USE THE DEFAULT LANGUAGE (CZECH)! IT IS USED BY THE PROGRAM TO DETECT WHETHER IT IS RUNNING CACHED!!!**

To update your existing instance of Coachium to the latest version, run the following:

```bash
cd /var/www/html/coachium # Or wherever you installed Coachium
git pull
```

**PRO TIP: Set up a Cron job to do this automatically for you.**
