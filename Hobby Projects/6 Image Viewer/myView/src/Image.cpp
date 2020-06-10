#include "Image.h"


Image::Image() {
	texture = new sf::Texture();
	sprite = new sf::Sprite();
}

Image::Image(std::string path) {
	Image();
	setImage(path);
}

Image::~Image() {
	delete sprite;
	delete texture;
	sprite = nullptr;
	texture = nullptr;
}


void Image::update(sf::Window &window) {
	if (isDraggable) {	
		int locX = sf::Mouse::getPosition(window).x;
		int locY = sf::Mouse::getPosition(window).y;

		int diffX = locX - clickLocX;
		int diffY = locY - clickLocY;

		clickLocX = locX;
		clickLocY = locY;

		if (sprite->getPosition().x < boundaryX || sprite->getPosition().x + width > boundaryX + boundaryWidth) {			
			x = sprite->getPosition().x + diffX;

			if (x > boundaryX + ARROW_WIDTH + PIC_BORDER / 2) {
				x = boundaryX + + ARROW_WIDTH + PIC_BORDER / 2;
			}

			if (x + width < boundaryX + boundaryWidth - ARROW_WIDTH - PIC_BORDER / 2) {
				x = (boundaryX + boundaryWidth - ARROW_WIDTH - PIC_BORDER / 2) - width;
			}

			sprite->setPosition(x, y);
		}

		if (sprite->getPosition().y < boundaryY || sprite->getPosition().y + height > boundaryY + boundaryHeight) {						
			y = sprite->getPosition().y + diffY;
			
			if (y > boundaryY + PIC_BORDER / 2) {
				y = boundaryY + PIC_BORDER / 2;
			}

			if (y + height < boundaryY + boundaryHeight - PIC_BORDER / 2) {
				y = (boundaryY + boundaryHeight - PIC_BORDER / 2) - height;
			}

			sprite->setPosition(x, y);
		}
	}
}

void Image::show(sf::RenderWindow &window) {
	window.draw(*sprite);
}


void Image::centerImage() {
	x = boundaryX + ((boundaryWidth - width) / 2);
	y = boundaryY + ((boundaryHeight - height) / 2);
	
	sprite->setPosition(x, y);
}

void Image::scaleToBoundary() {
	float factor;
	if (boundaryHeight < boundaryWidth) {
		factor = (boundaryHeight - PIC_BORDER) / texture->getSize().y;
	} else {
		factor = (boundaryWidth - PIC_BORDER) / texture->getSize().x;
	}

	sprite->setScale(factor, factor);
	setSize();
}

void Image::onPress(int mx, int my) {
	bool cond1 = mx >= x && mx <= x + width;
	bool cond2 = my >= y && my <= y + height;

	if (cond1 && cond2) {
		if (x < boundaryX || y < boundaryY || x + width > boundaryX + boundaryWidth || y + height > boundaryY + boundaryHeight) {
			isDraggable = true;
			clickLocX = mx;
			clickLocY = my;
		}
	}
}

void Image::onRelease() {
	if (isDraggable) {
		isDraggable = false;
	}
}

void Image::openImage() {
	std::string imgPath;
	nfdchar_t *path = NULL;
	nfdresult_t result = NFD_OpenDialog(IMAGE_FORMATS.c_str(), NULL, &path);

	if (result == NFD_OKAY) {
		int i = 0;
		while (path[i] != '\0') {
			imgPath += path[i];
			i++;
		}
	} else if (result == NFD_CANCEL) {
		// pass
	} else {
		std::cout << "Error: " << NFD_GetError() << std::endl;
	}

	setImage(imgPath);
}

void Image::rotateLeft() {
	sprite->rotate(-ROT_ANGLE);

	switch (rotation) {
	case Rotation::NORMAL:
		rotation = Rotation::LEFT;
		sprite->setOrigin(texture->getSize().x, 0);
		break;
	case Rotation::RIGHT:
		rotation = Rotation::NORMAL;
		sprite->setOrigin(0, 0);
		break;
	case Rotation::BOTTOM:
		rotation = Rotation::RIGHT;
		sprite->setOrigin(0, texture->getSize().y);
		break;
	case Rotation::LEFT:
		rotation = Rotation::BOTTOM;
		sprite->setOrigin(texture->getSize().x, texture->getSize().y);
		break;
	default:
		break;
	}

	setSize();
}

void Image::rotateRight() {
	sprite->rotate(ROT_ANGLE);

	switch (rotation) {
	case Rotation::NORMAL:
		rotation = Rotation::RIGHT;
		sprite->setOrigin(0, texture->getSize().y);
		break;
	case Rotation::RIGHT:
		rotation = Rotation::BOTTOM;
		sprite->setOrigin(texture->getSize().x, texture->getSize().y);
		break;
	case Rotation::BOTTOM:
		rotation = Rotation::LEFT;
		sprite->setOrigin(texture->getSize().x, 0);
		break;
	case Rotation::LEFT:
		rotation = Rotation::NORMAL;
		sprite->setOrigin(0, 0);
		break;
	default:
		break;
	}
	
	setSize();
}

void Image::zoomIn() {
	float fac = sprite->getScale().x;
	if (fac < maxScaleFac) {
		fac += scaleFac;
		sprite->setScale(fac, fac);
	}
	setSize();
}

void Image::zoomOut() {
	float fac = sprite->getScale().x;
	if (fac > minScaleFac) {
		fac -= scaleFac;
		sprite->setScale(fac, fac);
	}
	setSize();
}

void Image::imageLeft() {
	if (index > 0) {
		setImage(imageList[--index]);
	}
}

void Image::imageRight() {
	if (index < imageList.size() - 1) {
		setImage(imageList[++index]);
	}
}


void Image::setImage(std::string path) {
	if (!path.empty()) {
		texture->loadFromFile(path);
		texture->setSmooth(true);
		sprite->setTexture(*texture, true);
		sprite->setOrigin(0, 0);
		sprite->setRotation(0);
		sprite->setScale(sf::Vector2f(1, 1));
		rotation = Rotation::NORMAL;

		scaleToBoundary();
		setSize();
		getImageList(path);
	}
}

void Image::setBoundary(float rx, float ry, float rw, float rh) {
	boundaryX = rx;
	boundaryY = ry;
	boundaryWidth = rw;
	boundaryHeight = rh;

	scaleToBoundary();
}

void Image::setShowArrows(bool *varAddr) {
	showArrows = varAddr;
}

void Image::setSize() {
	if (rotation == Rotation::LEFT || rotation == Rotation::RIGHT) {  // horizontal
		width = sprite->getScale().y * texture->getSize().y;
		height = sprite->getScale().x * texture->getSize().x;
	} else {  // vertical
		width = sprite->getScale().x * texture->getSize().x;
		height = sprite->getScale().y * texture->getSize().y;
	}

	centerImage();
}

void Image::getImageList(std::string path) {
	std::filesystem::path dirPath = std::filesystem::path(path).parent_path();

	imageList.clear();

	for (const auto & file : std::filesystem::directory_iterator(dirPath)) {
		for (std::string ext : EXTS) {
			if (file.path().extension() == ext) {
				imageList.push_back(file.path().string());
				break;
			}
		}
	}

	if (showArrows != nullptr) {
		*showArrows = (imageList.size() > 1) ? true : false;
	}

	std::vector<std::string>::iterator it = std::find(imageList.begin(), imageList.end(), path);
	index = std::distance(imageList.begin(), it);
}

