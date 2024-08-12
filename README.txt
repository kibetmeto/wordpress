=== Tesla News Plugin ===
Contributors: Anthony Metto
Tags: news, Tesla, API
Requires PHP: 7.2
Stable tag: 1.1
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

The Tesla News Plugin fetches and displays the latest news articles related to Tesla from NewsAPI. The plugin includes options to configure the number of articles displayed and integrates seamlessly into your WordPress site.

== Installation ==

1. Upload the `tesla-news-plugin` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to Settings > Tesla News to configure the number of articles to display.
4. Use the shortcode `[tesla_news]` to display news articles on any post or page.

== Frequently Asked Questions ==

= How do I get an API key? =

Sign up at [NewsAPI](https://newsapi.org/) to get your API key. Replace `YOUR_ACTUAL_API_KEY` in the plugin file with your key.

= Can I customize the number of articles displayed? =

Yes, go to Settings > Tesla News to set the number of articles you want to display.

= Why am I seeing "Unable to retrieve news"? =

Check if your API key is correct and make sure your server has internet access. You can also enable debugging in WordPress to get more details about the error.

== Changelog ==

= 1.1 =

- Added User-Agent header to API requests to resolve retrieval issues.
- Improved styling and added options for pagination and search.

= 1.0 =

- Initial release.

== Upgrade Notice ==

= 1.1 =
This version includes important updates to ensure compatibility with NewsAPI and improved styling.

== Support ==

For support, please contact [kibet.metto@gmail.com](mailto:kibet.metto@gmail.com).
