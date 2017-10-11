# PHP API STARTER
-----

### Extend Base

```

class MyAPI extends API {

	private static $base = "https://myapi.com";

	private static $auth = "Basic *(U#HLHSDFKJH_WHATEVER...";

}

```

### Usage

```
MyAPI::get("/myendpoint");

```

```
MyAPI::post("/myendpoint",array('firstname'=>'paul','lastname'=>'cox'));

```

```
MyAPI::put("/myendpoint/{ID}",array('firstname'=>'paul','lastname'=>'cox'));

```