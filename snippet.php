<?php $_helper = Mage::helper('catalog/category') ?>
<?php $_categories = $_helper->getStoreCategories() ?>
<?php $currentCategory = Mage::registry('current_category') ?>

<?php if (count($_categories) > 0): ?>
    <ul class="cat-nav">
        <?php foreach($_categories as $_category): ?>
            <li>
                <a href="<?php echo $_helper->getCategoryUrl($_category) ?>">
                    <?php echo $_category->getName() ?>
                    <?php $catId = $_category->getId() ?>
                    <?php  $categories = new Mage_Catalog_Model_Category(); ?>
                    <?php  $categories->load($catId); ?>
                    <?php  $collection = $categories->getProductCollection()->addAttributeToSelect('name'); ?>
                    <ul>
                    <?php foreach ($collection as $product): ?>
                        <li>
                            <a href="<?php echo $product->getProductUrl(); ?>"><?php echo $product->getName() ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </a>
                <?php $_category = Mage::getModel('catalog/category')->load($_category->getId()) ?>
                <?php $_subcategories = $_category->getChildrenCategories() ?>
                <?php if (count($_subcategories) > 0): ?>
                    <ul>
                        <?php foreach($_subcategories as $_subcategory): ?>
                            <li>
                                <a href="<?php echo $_helper->getCategoryUrl($_subcategory) ?>">
                                    <?php echo $_subcategory->getName() ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
