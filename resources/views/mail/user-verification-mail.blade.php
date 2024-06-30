<x-mail::message>
# Crypto Luminex

Dear {!! $user->name !!},

Thank you for registering with Coin Me. To ensure the security of your account, please verify your email address.

<x-mail::button :url="$url">
Verify Email
</x-mail::button>

If you did not register for an account with Coin Me, please disregard this email.

Best regards,<br>
Crypto Luminex
</x-mail::message>
