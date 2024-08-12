# wordpress

# Tesla News Plugin

The Tesla News Plugin fetches and displays the latest news articles related to Tesla from NewsAPI. This plugin allows users to easily integrate Tesla news into their WordPress site and customize the display settings.

## Features

- Fetches the latest news about Tesla from NewsAPI.
- Configurable number of articles to display.
- User-Agent header included for API requests.
- Display news articles with images, titles, and publication dates.

## Installation

1. Upload the `tesla-news-plugin` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to `Settings` > `Tesla News` to configure the number of articles to display.
4. Use the shortcode `[tesla_news]` to display news articles on any post or page.

## Configuration

- **API Key**: Obtain your API key from [NewsAPI](https://newsapi.org/). Replace `YOUR_ACTUAL_API_KEY` in the plugin file with your key.
- **Number of Articles**: Set the number of articles to display via the plugin settings page in WordPress.

## Frequently Asked Questions

### How do I get an API key?

Sign up at [NewsAPI](https://newsapi.org/) to get your API key. Replace `YOUR_ACTUAL_API_KEY` in the plugin file with your key.

### Can I customize the number of articles displayed?

Yes, go to `Settings` > `Tesla News` to set the number of articles you want to display.

### Why am I seeing "Unable to retrieve news"?

Check if your API key is correct and ensure your server has internet access. Enable debugging in WordPress for more details.

## Changelog

### 1.1

- Added User-Agent header to API requests.
- Improved styling and added options for pagination and search.

### 1.0

- Initial release.

## Upgrade Notice

### 1.1

This version includes important updates to ensure compatibility with NewsAPI and improved styling.

## Support

For support, please contact [kibet.metto@gmail.com](mailto:kibet.metto@gmail.com).
