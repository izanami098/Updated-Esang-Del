# API Endpoints - Updated-Esang-Del

This README documents the simple REST-like API endpoints included with the project.

All endpoints return JSON and are located under `public/api/`.

## Authentication / Protection
- Write endpoints are protected by an API key stored in `.env` as `API_KEY`.
- Provide the API key either in the `X-API-KEY` HTTP header or as `api_key` param in POST/GET body.
- Change the default `API_KEY` value in `.env` before deploying.

## Endpoints

### GET /public/api/products.php
List products. Optional query params:
- `category` - filter by category name

Example:
```
GET /public/api/products.php
GET /public/api/products.php?category=Electronics
```

### GET /public/api/product_detail.php?id=123
Get a single product by id.

Example:
```
GET /public/api/product_detail.php?id=2
```

### GET /public/api/list_orders.php?limit=20
List recent orders (default limit 20).

Example:
```
GET /public/api/list_orders.php?limit=5
```

### POST /public/api/place_order.php
Create a new order (requires API key). JSON body example:
```
POST /public/api/place_order.php
Headers: X-API-KEY: <your_api_key>
Body (JSON): {"user_id":1,"product_id":2,"quantity":1}
```
Response: `{ "success": true, "order_id": 123 }`

### POST /public/api/update_order_status.php
Update an order's status (requires API key). JSON body example:
```
POST /public/api/update_order_status.php
Headers: X-API-KEY: <your_api_key>
Body (JSON): {"order_id":123, "order_status":"delivered"}
```

### GET /public/api/get_analytics.php?period=week|month|yearly
Analytics summary used by the dashboard. Returns `stats`, `status_breakdown`, `orders`, and `trend` arrays.

Example:
```
GET /public/api/get_analytics.php?period=week
```

## Notes & Recommendations
- Do not expose the API key to client-side code. Implement server-side session authentication if the frontend must trigger write actions.
- Use HTTPS in production.
- Lock down `Access-Control-Allow-Origin` to your domain in production.
- Consider adding rate limiting and logging for production deployments.

*** End of README ***
