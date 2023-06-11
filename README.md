# website_rank_checker
A very simple php tool for collecting website traffic and engagement data from mustat.com, such as monthly visits, pageviews and Alexa ranking etc.

The input is provided as a text file containing a list of websites, and the output is saved as a TSV file with the scraped data.

Features Scrape Seo, Performance, Traffic Rank, Overall Score, Visitors Per Months, Page views Per Months, and Alexa Rank for a list of websites. Read website list from a text file Export the scraped data as TSV. 
Requirements PHP, simple_html_dom.php.

Clone the repository to your local machine: git clone https://github.com/yourusername/website_rank_checker.git

Change to the repository directory: cd website_rank_checker

Usage Create a text file named url.txt in the directory and list the websites you want to scrape data for, with one website per line: example.com anotherexample.com

Run the script: php website_rank_checker.php url.txt 

The script will read the websites from the url.txt file, scrape their data from mustat, and save the results to a TSV file, output.tsv.
