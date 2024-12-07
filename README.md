# Easy Kos
This is a laravel project build using tailwind css and daisy ui. We also integrate midtrans for payment gateway.

#### To setup:
* [Tailwind](https://tailwindcss.com/docs/guides/laravel)
* [DaisyUI](https://daisyui.com/docs/install/)
* Midtrans - create account first and get this key from midtrans, then put it in your .env file. Check this for more info ->
[Integration guide](https://docs.midtrans.com/docs/snap-snap-integration-guide)

```
MIDTRANS_MERCHANT_ID = ...
MIDTRANS_CLIENT_KEY = ...
MIDTRANS_SERVER_KEY = ...

```
## Authentication Side
Used middleware to handle user authentication.
![Login Page](public/assets/documentation/image.png)
![Register Page](public/assets/documentation/image-1.png)
![Middleware](public/assets/documentation/image-2.png)

## Admin
Admin can view the total overview of the website user, order and review made by customer. Admin can also do CRUD on users.
![Admin Dashboard](public/assets/documentation/image-3.png)
![Admin Manage user-user](public/assets/documentation/image-4.png)
![Admin Manage User-kos](public/assets/documentation/image-5.png)
![Admin Manage user-penghuni](public/assets/documentation/image-6.png)
![Admin form kos](public/assets/documentation/image-7.png)
![Admin Form users](public/assets/documentation/image-8.png)

## Users - Visitor
Here visitor can view list of kos in the homepage, view the kos detail such as list of room avaiable, can order a room. For the payment, we integrate Midtrans as the payment gateway. Visitor can later review the kos after ordering.
![Visitor homepage](public/assets/documentation/image-9.png)
![Detail Kos](public/assets/documentation/image-11.png)
![Pemesanan](public/assets/documentation/image-12.png)
![opsi bayar](public/assets/documentation/image-13.png)
![bayar](public/assets/documentation/image-14.png)
![Pembayaran berhasil](public/assets/documentation/image-15.png)
![Riwayat](public/assets/documentation/image-16.png)
![Review](public/assets/documentation/image-17.png)

## Users - Owner
Here owner can create a new account. If they are new, the will be redirected to create new kos first. Then they can view their order, and report. Owner can accept or reject visitor order. Owner can also view list of rooms they have and add a new one.
![New owner](public/assets/documentation/image-18.png)
![Owner have kos](public/assets/documentation/image-19.png)
![Owner request](public/assets/documentation/image-20.png)
![Owner Laporan](public/assets/documentation/image-21.png)
![Owner add kamar](public/assets/documentation/image-22.png)