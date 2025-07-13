## Styling the Currently Active Navigation Link in Laravel

To highlight the currently active navigation link in your Laravel Blade layout, you can use the `request()->is()` helper. This helper checks if the current request path matches a given pattern, allowing you to conditionally apply CSS classes.

### Using a Blade Component for Navigation Links

Instead of repeating the conditional logic for each link, you can create a reusable Blade component. Here’s how you can use it in your layout:

```blade
<div class="ml-10 flex items-baseline space-x-4">
    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
</div>
```

And here is the implementation of the `nav-link` component (`resources/views/Components/nav-link.blade.php`):

```blade
@props(['active' => false])

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{ $attributes }}>
   {{ $slot }}
</a>
```

**Explanation:**

-   The `:active` prop is set using `request()->is('route')`, which checks if the current URL matches the given route.
-   The `nav-link` component receives this prop and applies the appropriate classes based on its value.
-   This makes your navigation code cleaner and more maintainable, as the logic for styling the active link is centralized in the component.

This approach ensures that the active page is visually distinct in your navigation bar, and your code is DRY (Don't Repeat Yourself).

**Explanation:**

-   `request()->is('route')` returns `true` if the current URL matches the given route (e.g., `'about'` for `/about`).
-   If it matches, the link gets the classes `bg-gray-900 text-white` (highlighted background and text).
-   If not, it gets the default classes `text-gray-300 hover:bg-gray-700 hover:text-white` (gray text, hover effect).

This approach ensures that the active page is visually distinct in your navigation bar.
