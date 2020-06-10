#include "TitleBar.h"


TitleBar::TitleBar(int nx, int ny, int nw, int nh) {
	x = nx;
	y = ny;
	width = nw;
	height = nh;

	font = new sf::Font();
	font->loadFromFile(Shared::workingDir + "tenderness.otf");

	rect = new sf::RectangleShape(sf::Vector2f(width, height));
	rect->setPosition(x, y);
	rect->setFillColor(sf::Color(0x0F111AFF));

	title = new sf::Text(WINDOW_TITLE, *font, DEF_FONT_SIZE);
	title->setPosition(x + titlePadding, (height - title->getGlobalBounds().height - title->getGlobalBounds().top) / 3);

	restore = new ImageButton(Shared::workingDir + "material-design-icons/restore.png");
	close = new ImageButton(Shared::workingDir + "material-design-icons/close.png");

	restore->setSize(btnWidth, nh);
	close->setSize(btnWidth, nh);
	
	restore->setPos(nw - btnWidth * 2, ny);
	close->setPos(nw - btnWidth, ny);
}


TitleBar::~TitleBar() {
	delete rect;
	delete font;
	delete title;
	delete restore;
	delete close;

	rect = nullptr;
	font = nullptr;
	title = nullptr;
	restore = nullptr;
	close = nullptr;
}

void TitleBar::show(sf::RenderWindow &window) {
	window.draw(*rect);
	window.draw(*title);

	restore->show(window);
	close->show(window);
}

void TitleBar::onWindowResize(int nw) {
	width = nw;

	rect->setSize(sf::Vector2f(width, height));

	restore->setPos(nw - btnWidth * 2, y);
	close->setPos(nw - btnWidth, y);
}

void TitleBar::onHover(int mx, int my) {
	restore->onHover(mx, my);
	close->onHover(mx, my);
}

void TitleBar::onClick(int mx, int my, sf::RenderWindow &window) {
	// handle onClick restore button
	if (mx >= restore->getX() && mx <= restore->getX() + restore->getWidth() && my >= restore->getY() && my <= restore->getY() + restore->getHeight()) {
		int monWidth = sf::VideoMode::getDesktopMode().width;
		int monHeight = sf::VideoMode::getDesktopMode().height;
		
		if (isFullScreen) {
			window.setSize(sf::Vector2u(monWidth * 5 / 6, monHeight * 5 / 6));
			window.setPosition(sf::Vector2i((monWidth - window.getSize().x) / 2, (monHeight - window.getSize().y) / 2));
		} else {
			window.setSize(sf::Vector2u(monWidth, monHeight - 50));
			window.setPosition(sf::Vector2i(0, 0));
		}

		isFullScreen = !isFullScreen;
	}


	// handle onClick close button
	if (mx >= close->getX() && mx <= close->getX() + close->getWidth() && my >= close->getY() && my <= close->getY() + close->getHeight()) {
		window.close();
	}
}

